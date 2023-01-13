   //hiện sản phẩm khi click vào danh mục sản phẩm
    $(document).on('click','.category',function(){
            id_category = $(this).attr('id_category')
            $current_page = 1;
            $.post("showproduct/productpage",{page:$current_page,id:id_category},function(data){
                 $("#listproduct").html(data);
            });

            $.post("ajax/paging",{page:$current_page,id:id_category},function(data){
                $("#getpage").html(data);
           });
    });

    // khi băt đầu chạy trang web thì số trang mặc định là 1
    $(document).ready(function(){
        id_start = 0;
        current_page = 1;
            id_category = id_start
            $.post("showproduct/productpage",{page:current_page,id:id_category},function(data){
                 $("#listproduct").html(data);
            });

            $.post("ajax/paging",{page:current_page,id:id_category},function(data){
                $("#getpage").html(data);
           });
    });
    // khi kích vào tất cả sản phẩm thì số trang mặc định là 1
    $(document).on('click','.allproduct',function(){
            id_category = 0;
            current_page = 1;
            $.post("showproduct/productpage",{page:current_page,id:id_category},function(data){
                 $("#listproduct").html(data);
            });

            $.post("ajax/paging",{id:0},function(data){
                $("#getpage").html(data);
           });

    });
    //hiện chi tiết sản phẩm
    $(document).on('click','.add-to-cart',function(){
        id_product = $(this).attr('idproduct');
        $("#details").css("transform","translateY(0%)")
        $("#details").css("transition","all 0.5s")
        $("#overflow").css("display","block")
        $.post("ajax/details",{id:id_product},function(data){
                 $("#details").html(data);
        });
    });
    //đóng chi tiết sản phẩm
    $(document).on('click','.fa-times-circle',function(){
        $("#details").css("transform","translateY(-150%)")
        $("#overflow").css("display","none")
    });

    //xử lý khi người dùng bấm chuyển trang
    $(document).on('click','.nextpage',function(){
        current_page =  $(this).attr('numPage')
        $.post("ajax/paging",{page:current_page,id:id_category},function(data){
            $("#getpage").html(data);
        });
        $.post("showproduct/productpage",{page:current_page,id:id_category},function(data){
            $("#listproduct").html(data);
       });
    });
    //thêm sản phẩm vào giỏ hàng
