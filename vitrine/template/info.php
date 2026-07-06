<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <?php 
        $recipes =[
            [
                'title' =>'couscous',
                'recipe'=>'Etape 1 : de la semoule',
                'author' => 'mickael.andrieu@exemple.com',
                'is_enabled' =>false,
            ],
            [
                'title' =>'Cassoulet',
                'recipe'=>'Etape 1 : des flageolets !',
                'author' => 'mathieu.andrieu@exemple.com',
                'is_enabled' =>true,
            ],
            [
                'title' =>'Escalope milanaise',
                'recipe'=>'Etape 1 : prenez une belle escalope',
                'author' => 'mickael.andrieu@exemple.com',
                'is_enabled' =>true,
            ],
        ];

        if(array_key_exists('is_enabled',$recipes)){
              foreach ($recipes as $recipe => $reci){
                echo $recipe[0] .'  '.$reci[1] ;
              }
        }

     ?>  
</body>
</html>
