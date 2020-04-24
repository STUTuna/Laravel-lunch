@extends('layouts.app')

@section('content')
<br>
<br>
<form>
    @csrf
    <div class="form-group">
        <label for="店家名稱">店家名稱</label>
        <input type="text" class=" form-control" id="店家名稱" placeholder="請輸入店家名稱">
        <small class="form-text text-muted">一些說明之類的咚咚</small>
    </div>
    <div class="form-group">
        <label for="店家電話">店家電話</label>
        <input type="text" class="form-control" id="店家電話" placeholder="請輸入電話">
    </div>
    <div class="form-group">
        <label for="備註">備註</label>
        <input type="text" class="form-control" id="備註" placeholder="備註">
    </div>
    <button class="btn btn-info" type="submit" id="btn_submit">新增餐廳</button>
</form>
<br>
<table class="table table-striped table-hover">
    <thead>
        <th></th>
        <th scope="col">店名</th>
        <th scope="col">電話</th>
        <th scope="col">備註</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($stores as $store)
        <tr>
            <td>
                <button type="button" class="btn btn-danger btn-del" value="{{ $store->id }}"> 刪除</button>
            </td>
            <td>{{ $store->store_name }}</td>
            <td>{{ $store->store_tel }}</td>
            <td>{{ $store->store_remark }}</td>
        </tr>
        @endforeach
        <div id='target_store'></div>
    </tbody>
</table>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });

        $('.btn-del').click(function () {
            let store_id = $(this).attr('value');

            swalWithBootstrapButtons.fire({
                icon: 'warning',
                title: '確定要刪除嗎',
                text: '刪除後就無法復原喔!!!',
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete!',
                cancelButtonText: 'No, Cancel!'
            })
            .then((result) => {
                console.log(result);
                if (result.value) {
                    $.ajax({
                        type: 'POST',
                        url: '/store/delete',
                        data: {
                            'store_id': store_id
                        },
                        success: function (data) {
                            if (data == 1) {
                                //如果刪除成功
                                swalWithBootstrapButtons.fire(
                                    '刪除成功!',
                                    '此店家已被刪除',
                                    'success'
                                ).then((data) => {
                                    //data:true
                                    window.location.reload();
                                });
                            }
                        }
                    })

                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })
        });

        $('#btn_submit').click(function () {
            let 店家名稱 = $('#店家名稱').val();
            let 店家電話 = $('#店家電話').val();
            let 備註 = $('#備註').val();
            $.ajax({
                type: 'POST',
                url: '/store/create',
                data: {
                    'store_name': 店家名稱,
                    'store_tel': 店家電話,
                    'store_remark': 備註
                },
                success: function (data) {
                    if (data == 1) {
                        //如果成功
                        Swal.fire({
                                icon: 'success',
                                title: '新增成功',
                                showConfirmButton: true,
                                timer: 1500
                            })
                            .then((data) => {
                                //data:true
                                window.location.reload();
                            });
                    } else {
                        //如果失敗
                        Swal.fire({
                            icon: 'error',
                            title: '新增失敗',
                            showConfirmButton: true,
                            timer: 1500
                        })
                    }
                }
            });
        });

    });

</script>
@endsection
