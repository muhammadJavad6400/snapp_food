var deleteBtns = document.querySelectorAll('.delete-record');
deleteBtns.forEach((btn , i) => {
    btn.addEventListener('click' , function(){
        swal({
            title: "آیا مطمئن هستید؟",
            text: "در صورت پاک کردن امکان بازیابی اطلاعات وجود ندارد",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            buttons: {
                cancel: "انصراف",
                ok: "تایید",
              }
          })
          .then((willDelete) => {
            if (willDelete) {
                 btn.parentElement.submit();
                 swal("آیتم مورد نظر با موفقیت حذف شد", {
                    icon: "success",  
                    ok: "تایید"
                });
            } else {
              swal({
                title: "آیتم مورد نظر حذف نشد",
                buttons:{
                    ok: "تایید"
                }

              });
            }
          });
    
    });
})
