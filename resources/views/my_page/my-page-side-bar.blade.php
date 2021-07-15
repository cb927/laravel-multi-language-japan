<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12 my-page-side-bar">
    @foreach($personal->left_profile_table_body as $row)
    <div class="d-flex-right">
        <span>{{$row[0]}}</span>
        <div class="gradient-div gradient-div-submain">{{$row[1]}}</div>
    </div>
    @endforeach
</div>