<div class="card m-4" style="width: 18rem;">
    <div class="card-body">
        <h3 class="card-title">{{$post['title']}}</h3>
        <p class="card-text">{{$post['description']}}</p><br>
        <a href="#" class="btn btn-primary"><cite title="Source Title p-5 text-secondary">Created at: {{$post['created_at']}}</cite></a><br><br>
        <a href="#" class="btn btn-primary"><cite title="Source Title p-5 text-secondary">updated at: {{$post['updated_at']}}</cite></a>
    </div>
</div>