<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><?= $data['title']?></h3>
            <a href="admin/showcategory" class="btn btn-primary">Trở Về</a>
            <h3 class="text-success"><?= $data["mess"]?></h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="x_content">
        <form class="" action="" method="post" novalidate>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Tên Danh Mục</label>
                        <input id="name" type="text" onkeyup="removeAccents(this)" class="form-control" name="name_category">
                        <input type="text" name="slug" id="slug" hidden>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" name="submit">Thêm Mới</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>





<!-- <Hàm lấy slug> -->
<!--<script>-->
<!--    function removeAccents(str) {-->
<!--        let substr = str.value;-->
<!--        var AccentsMap = [-->
<!--            "aàảãáạăằẳẵắặâầẩẫấậ",-->
<!--            "AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬ",-->
<!--            "dđ", "DĐ",-->
<!--            "eèẻẽéẹêềểễếệ",-->
<!--            "EÈẺẼÉẸÊỀỂỄẾỆ",-->
<!--            "iìỉĩíị",-->
<!--            "IÌỈĨÍỊ",-->
<!--            "oòỏõóọôồổỗốộơờởỡớợ",-->
<!--            "OÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢ",-->
<!--            "uùủũúụưừửữứự",-->
<!--            "UÙỦŨÚỤƯỪỬỮỨỰ",-->
<!--            "yỳỷỹýỵ",-->
<!--            "YỲỶỸÝỴ",-->
<!--            " .:/@#<>%^*()",-->
<!--        ];-->
<!--        for (var i=0; i<AccentsMap.length; i++) {-->
<!--            var re = new RegExp('[' + AccentsMap[i].substr(1) + ']', 'g');-->
<!--            var char = AccentsMap[i][0];-->
<!--            substr = substr.replace(re, char);-->
<!--            substr = substr.replace(/\s/g,'-');-->
<!--        }-->
<!--        document.querySelector('#slug').value = substr;-->
<!--    }-->
<!--</script>-->
<!-- </Hàm lấy slug> -->
