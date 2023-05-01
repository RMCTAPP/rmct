<?php 

include '../shared/configuration.php';

header('Content-type: application/json');

$token = $_GET['token'];

if ($_POST) {

	$action = $_POST['action'];

	if ($action == 'add-to-cart') {

		$product_id = $_POST['product'];
		$quantity = $_POST['quantity'];		

		$stmt = $conn->prepare('SELECT * FROM customers WHERE app_token=?');
		$stmt->execute([$token]);
		$customer = $stmt->fetch();

		$stmt = $conn->prepare('SELECT * FROM product_items WHERE id=?');
		$stmt->execute([$product_id]);
		$productItem = $stmt->fetch();

		$currentStocks = $productItem['current_stocks'];

		$stmt = $conn->prepare('SELECT * FROM cart_items WHERE customer_id=? AND product_item_id=?');
		$stmt->execute([$customer['id'], $product_id]);
		$cartItem = $stmt->fetch();

		if ($cartItem) {

			$quantity = $quantity + $cartItem['quantity'];

			if ($currentStocks >= $quantity) {

				$stmt= $conn->prepare("UPDATE cart_items SET quantity=? WHERE id=?");
				$stmt->execute([$quantity, $cartItem['id']]);

				$data = [
					"status" => "success",
					"message" => "Cart updated",
				];

			} else {

				$data = [
					"status" => "error",
					"message" => "Quantity exceeded to limit maximum of {$currentStocks}",
				];

			}

		} else {

			$stmt = $conn->prepare("INSERT INTO cart_items (customer_id, product_item_id, quantity, price) VALUES (?,?,?,?)");
	        $stmt->execute([$customer['id'], $product_id, $quantity, $productItem['price']]);

	        $data = [
				'status' => 'success',
				'message' => 'Item added to cart',
			];
		}

		echo json_encode($data);

	} elseif ($action == 'update-item') {

		$cart_id = $_POST['cart'];
		$quantity = $_POST['quantity'];

		$stmt = $conn->prepare('SELECT * FROM cart_items WHERE id = ?');
		$stmt->execute([$cart_id]);
		$cartItem = $stmt->fetch();

		$stmt = $conn->prepare('SELECT * FROM product_items WHERE id = ?');
		$stmt->execute([$cartItem['product_item_id']]);
		$productItem = $stmt->fetch();
		$currentStocks = $productItem['current_stocks'];

		if ($currentStocks >= $quantity) {

			$stmt= $conn->prepare("UPDATE cart_items SET quantity=? WHERE id=?");
			$stmt->execute([$quantity, $cart_id]);

			$data = [
				'status' => 'success',
				'message' => 'Item quantity updated',
			];

		} else {

			$stmt= $conn->prepare("UPDATE cart_items SET quantity=? WHERE id=?");
			$stmt->execute([$currentStocks, $cart_id]);
			$data = [
				'status' => 'warning',
				'message' => 'Quantity exceeded to item current stock',
			];

		}

		echo json_encode($data);

	}
} else {

	$stmt = $conn->prepare('SELECT * FROM customers WHERE app_token=?');
	$stmt->execute([$token]);
	$customer = $stmt->fetch();

	$query = $conn->prepare("SELECT * FROM cart_items WHERE customer_id=?");
	$query->execute([$customer['id']]);
	$cartItems = $query->fetchAll(PDO::FETCH_ASSOC);

	$cartItems = array_map(function($cartItem) {

		global $conn;

		$query = $conn->prepare("SELECT * FROM product_items WHERE id=?");
        $query->execute([$cartItem['product_item_id']]);
        $product = $query->fetch(PDO::FETCH_ASSOC);

        $query = $conn->prepare("SELECT * FROM product_item_images WHERE product_item_id=?");
        $query->execute([$product['id']]);
        $productItemImages = $query->fetchAll(PDO::FETCH_ASSOC);

        $imageDirectory = '../shared/uploads/';
        $productItemImage = 'no-image-available.png';
        if ($productItemImages) {
            $productItemImage = $productItemImages[0]['filename'];
        }
        $productItemImage = $imageDirectory.$productItemImage;

		return [
			'id' => $cartItem['id'],
			'product' => [
				'id' => $product['id'],
				'name' => $product['name'],
				'price' => number_format($product['price'], 2),
				'stocks' => $product['current_stocks'],
				'image' => $productItemImage,
			],
			'quantity' => $cartItem['quantity']
		];

	}, $cartItems);

	$data = [
		'status' => 'success',
		'message' => 'cart items',
		'data' => $cartItems
	];

    echo json_encode($data);

}
