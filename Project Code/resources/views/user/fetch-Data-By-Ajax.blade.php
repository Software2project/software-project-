@foreach ($users as $user)
<tr>
    <input type="hidden" class="deleted_id" value="{{$user->id}}">
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->department}}</td>
    <td>{{$user->univeristy}}</td>
    <td>
        <?php $created_at = new DateTime($user->created_at);  $date = $created_at->format('Y-m-d');?>
        {{$date}}
    </td>
    <td>
        <div class="row">
            <div class="col-md-2 px-2">
                <a href="users/detail/{{$user->id}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="مشاهدة الملف">
                    <i class="fa fa-eye"></i>
                </a>
            </div>
        </div>
    </td>
</tr>
@endforeach
