$(window).load(function(){
   
   var totalProducts = 1;
   $("#addMoreProduct").click(function(){
       
       var newFields = '<div class="add_prod_field">'+
                        '<label>Title</label>'+
                        '<input type="text" size="40" name="data['+totalProducts+'][Product][title]" required="required"/>'+
                    '</div>'+
                    '<div class="add_prod_field">'+
                        '<label>SKU</label>'+
                        '<input type="text" size="40" class="code" name="data['+totalProducts+'][Product][sku]" required="required"/>'+
                    '</div>'+
                    '<div class="add_prod_field">'+
                        '<label>Description</label>'+
                        '<input type="text" class="descr" name="data['+totalProducts+'][Product][descr]"/>'+
                    '</div>';
                
                $("#product_fields").append(newFields);
                totalProducts++;
   });
});