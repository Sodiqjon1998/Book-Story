    
$(document).ready(function(){


    $(document).on('change', '.radio_val', function(event){

        event.preventDefault();

        let val = $(this).val();

        let sum = $('#summa').html();

        let total = 1 * sum + 1 * val;

        let summa = $('#sum_total').html(total);

        $.ajax({
            url: '/product/ajax',
            data: {sum: total},
            type: "POST",
            success: function(data){
                console.log(data);
            }
        })

     

    });






    


    $(document).on('keyup', '.search', function(event){

        event.preventDefault();

        let url = $("#my_form").attr('action');
        let form = $("#my_form").serialize();


        let div = '';

        $.ajax({
            url: url,
            type: "GET",
            data: {
                search: $(this).val(),
            },  
            success: function(dt){
                console.log(dt);
                var lang = dt.lang
                console.log(lang);
                var data = dt.content;
                data.forEach(item => {

                    div = div + "<div class='media row'>"+
                    "<div class='img-holder ml-1 mr-2 col-4'>"+
                        "<a  href='<?='><img src='"+item.img+"' class='align-self-center' alt='cartitem'></a>"+
                    "</div>"+
                    "<div class='media-body mt-auto mb-auto col-8'>"+
                        "<h5 class='name'><a  href='/product/product-detail?id="+item.id+"'>"+item.title+"</a></h5>"+
                        "<p class='category'>Award Winning Book</p>"+
                        "<a class='btn black-sm-btn' href='/product/cart-page'><i class='fas fa-folder'></i></a>"+
                        "<a class='btn black-sm-btn' href='/product/product-detail?id="+item.id+"'><i class='fas fa-eye'></i></a>"+
                    "</div>"+
                "</div>"
                });
                $(".my_search").html(div);
            },
        })

    });





    $(document).on('click', '.clicked', function(event){

        event.preventDefault();

        let href = $(this).attr('href');
        
        $.ajax({
            url: href,
            type: "GET",
            success:function(req){
                toastr.success(req.message);
                $("#my_table").html(req.content);
                $("#countshow").html(req.allCount);
                $('#loading').html(req);
                
                // document.querySelector("#my_div").className = "cart-box-overlay fixed-box";
            },
        });
    });



    

    
    $(document).on('click', '.my_product_remove', function(event){


        event.preventDefault();

        var  href = $(this).attr('href');

        $.ajax({
            
            'url': href,
            
            type: "GET",

            'success': function(req){
                
                $("#countshow").html(req.allCount);
                
                $('#my_content').html(req.content);
                
                $('#my_table').html(req.content1);

                toastr.error(req.xabar);

            }
        });
    
    });

    
    $(document).on('click', '.my_basket_removes', function(event){


        event.preventDefault();

        var  href = $(this).attr('href');

        $.ajax({
            
            'url': href,
            
            type: "GET",

            'success': function(req){
                
                $("#countshow").html(req.allCount);
                $('#my_table').html(req.content);
                $('#my_content').html(req.content1);
                toastr.error(req.xabar);
                
                document.querySelector("#my_div").className = "cart-box-overlay fixed-box";

            }
        });
    
    });








    $(document).on('click', '.plus', function(event){
        event.preventDefault();
        let href = $(this).attr('href');
        let id = $(this).data('id');
        $.ajax({
            "url": href,
            data: {ids: id},
            "type": "GET",
            "success": function(req){
                $("#countshow").html(req.allCount);
                $('#my_content').html(req.content);
                $('#my_table').html(req.content1);
                toastr.success(req.message);
            },
        });
    });






    
    $(document).on('click', '.minus', function(event){
        
        event.preventDefault();

        let href = $(this).attr('href');

        let id = $(this).data('id');
        $.ajax({
            "url": href,
            data: {ids: id},
            "type": "GET",
            "success": function(req){
                $("#countshow").html(req.allCount);
                $('#my_content').html(req.content);
                $('#my_table').html(req.content1);
                toastr.error(req.xabar);
              
                console.log(req.content1);
            }
        });
    });




    $(document).on('click', '#close-window1', function(event){

        event.preventDefault();

        document.querySelector('#my_div').className = "cart-box-overlay";

    })

    

});
