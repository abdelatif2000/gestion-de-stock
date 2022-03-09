 <?php

           ---> $result =DB::select("SELECT  * from commands as c,product_command as pc ,products as p , clients as cl  WHERE c.id=pc.command_id AND 
            p.id=pc.product_id and cl.id=c.client_id and c.id=$id");

          ----->SELECT * FROM `products` WHERE NOT EXISTS 
          (SELECT * FROM `request_items` where `products`.`id` = `product_id` and `request_id` = ? )

         ----> $query->whereRaw('age BETWEEN ' . $ageFrom . ' AND ' . $ageTo . '');
         -$query->whereBetween('age', [$ageFrom, $ageTo]);

         --$posts = Country::find(2)->posts();

         --select * from `table_1` where `field_1` = 'xyz' limit 1
         