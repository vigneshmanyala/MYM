<?php


function component($prd_name,$prd_price,$prd_image,$prd_id){
    $element ="
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
    <form action=\"homepage.php\" method=\"post\">
        <div class=\"card shadow\" class=\"card\">
          <div>
             <img src=\"$prd_image\" >  
          </div>
           <div class=\"card-body\">
             <h4 class=\"name\" class=\"card-title\">$prd_name</h4>
             <h5>
               <span class=\"pp\" class=\"price\">$prd_price/- </span>
             </h5>
             <label>Quantity</label>
             <input type=\"text\" name=\"qnt\" required>
             <button type=\"submit\"  class=\"btn btn-warning my-3\" name=\"add\">Add to cart<i class=\"fa fa-shopping-cart\"></i></button>
             <input type=\"hidden\" name=\"prd_id\" value=\"$prd_id\">
           </div>
        </div>

    </form>
  </div>
    ";
     echo $element;
}


function cartElement($prd_image,$prd_name,$prd_price,$prd_id,$qnt,$pr){
  $element="
  
  <form action=\"cart.php?action=remove&prd_id=$prd_id\" method=\"post\" class=\"cart-items\">
                        <div class=\"border rounded\">
                            <div class=\"row bg-white\">
                                <div class=\"col-md-3\">
                                  <img src=\"$prd_image\" class=\"img-fluid\">
                                </div>
                                <div class=\"col-md-6\">
                                    <h5 class=\"pt-2\">$prd_name</h5>
                                    <small class=\"text-secondary\">Seller: daily</small>
                                    <h5 class=\"pt-2\">Price:$prd_price</h5>
                                    <h5 class=\"pt-2\">Quantity:$qnt</h5>
                                    
                                    <h5 class=\"pt-2\">SubTotal:$pr</h5>
                                    <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                                </div>
                                <div class=\"col-md-3 py-5\">
                                    <div>
                                        <button type=\"button\"  class=\"btn bg-light border rounded-circle\"><i class=\"fa fa-minus\"></i></button>
                                        <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline ta-center\">
                                        <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fa fa-plus\"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
      
     
    
  ";
  echo $element;
}




?>