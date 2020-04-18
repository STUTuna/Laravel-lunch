@extends('layouts.app')


@section('content')
<br>
<br>
<br>
<br>

<form>
    <div class="form-group">
        <label for="店家名稱">店家名稱</label>
        <input type="text"" class=" form-control" id="店家名稱" aria-describedby="emailHelp" placeholder="請輸入店家名稱">
        <small id="emailHelp" class="form-text text-muted">一些說明之類的咚咚</small>
    </div>
    <div class="form-group">
        <label for="店家電話">店家電話</label>
        <input type="text" class="form-control" id="店家電話" placeholder="請輸入電話">
    </div>

    <button class="btn btn-info" type="button">新增餐廳</button>
</form>
<br>
<table class="table table-striped table-hover">
    <thead>
        <th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
        </tr>
    </tbody>
</table>

@endsection
