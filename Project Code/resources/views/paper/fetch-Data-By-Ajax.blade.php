@foreach ($papers as $paper)
<tr>
    <input type="hidden" class="deleted_id" value="{{$paper->id}}">
    <td>{{$paper->id}}</td>
    <td>{{$paper->title}}</td>
    <td>{{$paper->user->name}}</td>
    <td>
        <?php $created_at = new DateTime($paper->created_at);  $date = $created_at->format('Y-m-d');?>
        {{$date}}
    </td>
    <td>
        <div class="row">
            <div class="col-md-4">
                @if ($paper->user_id == auth()->user()->id)
                <a href="papers/{{$paper->id}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="مشاهدة البحث">
                    <i class="fa fa-edit"></i>
                </a>
                @else 
                <a href="papers/detail/{{$paper->id}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="مشاهدة البحث">
                    <i class="fa fa-eye"></i>
                </a>
                @endif
                
            </div>
        </div>
    </td>
</tr>
@endforeach
