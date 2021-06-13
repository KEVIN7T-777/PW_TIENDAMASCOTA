<div class="container">
        <div class="row">
          <?php $productos->carrito(); ?>
          <?php
            if(isset($_SESSION['carrito'])){
              $totalCoste=0;
              $Total=0;
          ?>
          <div class="center">
          <div class="table-responsive">
            <table class="table productosC">
            <thead>
                <tr>
                    <th  class="center">Id</th>
                    <th class="center">Especie</th>
                    <th class="center">Precio</th>
                    <th class="center">Cantidad</th> 
                    <th></th>
                    <th class="center">Importe</th>
                </tr>
            </thead>
            <?php
              foreach ($_SESSION['carrito'] as $key=>$valor) {
                $fi=$productos->getProductosPorID($key);
                foreach ($fi as $fila) {

                 $id=$fila['id'];
                 $produc=$fila['especie'];
                 $pre=$fila['precio'];
                 $foto='<img  src="administracion/'.$fila["foto"].'" width="50" height="70">';



              }
                $coste=$pre*$valor;
                $totalCoste=$totalCoste+$coste;
                $Total=$Total+$valor;
            ?>


             <tr>


               <td width="100px" class="center"><?php echo $produc?></td>
               <td class="center"><?php echo $foto ?></td>
               <td class="center"><?php echo "$".number_format($pre)?></td>
               <td class="center"><?php echo $valor ?></td>


             <td class="center">
               <span style="cursor:pointer; color:#5cb85c;" class=" glyphicon glyphicon-plus" onclick="add(<?php echo $id ?>,'add')"></span>
               <span style="cursor:pointer; color:#FF0004;" class=" glyphicon glyphicon-minus" onclick="add(<?php echo $id ?>,'remove')"></span>
               <span style="cursor:pointer; color:#CC0011;" class=" glyphicon glyphicon-remove"onclick="add(<?php echo $id ?>,'removePro')"></span>
             </td>
             <td class="center"><?php echo "$".number_format($coste) ?></td>
             </tr>

            <?php
             }
            ?>

             <tr class="">
               <td></td><td></td><td><td></td>
               <td class="center"> <strong>Total:</strong> </td>
               <td class="center"><?php echo "$".number_format($totalCoste)?></td>
             </tr>
          </table>
          </div>
          </div>
          <?php
            }
            $_SESSION['totalCoste']=$totalCoste;
            $_SESSION['cantidad']=$Total;
          ?>
        </div>
   </div>
   