<form action="{{ route('admin.'.$route.'.destroy', ['id'=>$data->id]) }}" method="post">
    @method('delete')
    @csrf
    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('هل انت متأكد من الحذف ؟')"><i class="fa fa-trash"></i></button>
</form>