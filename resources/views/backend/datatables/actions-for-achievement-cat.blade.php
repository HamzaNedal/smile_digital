<form action="{{ route('admin.'.$route.'.destroy', ['id'=>$data->id]) }}" method="post">
    @method('delete')
    @csrf
<div class='btn-group'>
    <a href="{{ route('admin.'.$route.'.edit', [$data->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>

        @if ($data->achievements->isNotEmpty())
        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash"></i></button>
            @include('backend.datatables.model-for-achievement')
        @else
            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('هل انت متأكد من الحذف ؟')"><i class="fa fa-trash"></i></button>
        @endif

</div>
</form>
