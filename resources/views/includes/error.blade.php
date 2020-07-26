@if ( count($errors->getBags()) > 0 )
    <div class="card bg-danger p-5">
        <p class="text-white">Please fix the following errors</p>
        <ul class="list-group-horizontal text-white list-unstyled">
            @php
                $i=1;
                foreach($errors->all() as $message){
                    echo '<li class="">' . $i . ' - ' . $message . '</li>';
                    $i++;
                }
            @endphp
        </ul>
    </div>
@endif
