<?php

$pdo = new PDO('mysql:host=localhost;dbname=boutique', 'root','');
set_time_limit(500);

// chemin d'accès à votre fichier JSON

$file ="products.json";

// mettre le contenu du fichier dans une variable

$data = file_get_contents($file);

// décoder le flux JSON

$obj =json_decode($data);

// accéder à l'élément approprié

//faire une fonction pour recevoir et une autre pour ecrire dans la BD

foreach($obj as $product){

$ref=$product->sku;

$name=$product->name;

$description=$product->description;

$price=$product->price;

$image=$product->image;

$sql="INSERT INTO produit VALUES(:ref,:name,:description,:price,:image)";

$stmt=$pdo->prepare($sql);

$stmt->execute([

'ref'=>$ref,

'name'=>$name,

'description'=>$description,

'price'=>$price,

'image'=>$image

]);

}

?>

