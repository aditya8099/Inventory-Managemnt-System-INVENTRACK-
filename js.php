<script>
        const CurrentLocation = location.href;
        const MenuItem = document.querySelectorAll('a');
        const MenuLength = MenuItem.length
        for (let i = 0; i < MenuLength; i++) {
            if (MenuItem[i].href === CurrentLocation) {
                MenuItem[i].className = "active"
            }
        }
</script>
<!-- Products -->
<script>
    $(document).ready(function() {
        $('.delete_btn_Forcategory').click(function(e) {
            e.preventDefault();
            var del1 = $(this).closest("tr").find('.delete_ctgid').val();
            console.log(del1);
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "POST",
                            url: "Deleteproduct.php",
                            data: {
                                "delete_btn_set1": 1,
                                "delete_ctgid": del1,
                                // "delete_ctgName": del2,
                            },

                            success: function(response) {
                                swal("Data successfully Deleted.!" ,{
                                    icon: "success",
                                }).then((result) => {
                                        location.reload();
                                    });
                            }
                        });
                    }
                });

        });
    });
</script>
<!-- For Supplier -->
<script>
    $(document).ready(function() {
        $('.delete_btn_ForSupplier').click(function(e) {
            e.preventDefault();
            var del3 = $(this).closest("tr").find('.delete_supid').val();
            var del4 = $(this).closest("tr").find('.delete_SupName').val();
            console.log(del3);
            console.log(del4);
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, All the Product related to this also permanently deleted",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "POST",
                            url: "deleteSupplier.php",
                            data: {
                                "delete_btn_set2": 1,
                                "delete_supid": del3,
                                "delete_SupName": del4,
                            },

                            success: function(response) {
                                swal("Data successfully Deleted.!" ,{
                                    icon: "success",
                                }).then((result) => {
                                        location.reload();
                                    });
                            }
                        });
                    }
                });

        });
    });
</script>
<!-- For Customer -->
<script>
    $(document).ready(function() {
        $('.delete_btn_Forcustomer').click(function(e) {
            e.preventDefault();
            var del4 = $(this).closest("tr").find('.delete_cusid').val();
            console.log(del4);
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Record!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "POST",
                            url: "deletecustomer.php",
                            data: {
                                "delete_btn_set3": 1,
                                "delete_cusid": del4,
                                // "delete_ctgName": del2,
                            },

                            success: function(response) {
                                swal("Data successfully Deleted.!" ,{
                                    icon: "success",
                                }).then((result) => {
                                        location.reload();
                                    });
                            }
                        });
                    }
                });

        });
    });
</script>
