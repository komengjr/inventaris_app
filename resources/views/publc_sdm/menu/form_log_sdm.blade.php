<div class="bg-white tm-block">
    <div class="row">
        <div class="col-12">
            <h2 class="tm-block-title">{{ $log->nama_log_sdm }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if ($form->isEmpty())

            @else
            <form action="{{ route('simpan_form_log') }}" method="POST" class="tm-signup-form" enctype="multipart/form-data">
                @csrf
                <input type="text" name="kd_log_sdm" id="" value="{{$form[0]->kd_log_sdm}}" hidden>
                <input type="text" name="user" id="" value="{{$user}}" hidden>
                @foreach ($form as $form)
                    <div class="form-group">
                        <label for="name">{{$form->nama_s_log_sdm_form}}</label>
                        @if ($form->type_s_log_sdm_form == 'option')
                            @php
                                $data =  DB::table('s_log_sdm_form_option')->where('kd_s_log_sdm_form',$form->kd_s_log_sdm_form)->get();
                            @endphp
                           <select class="form-control" name="{{$form->kd_s_log_sdm_form }}" id="" required>
                                @foreach ($data as $data)
                                    <option value="{{$data->option}}">{{$data->option}}</option>
                                @endforeach
                           </select>
                        @else
                        <input id="{{$form->kd_s_log_sdm_form }}" name="{{$form->kd_s_log_sdm_form }}" type="{{$form->type_s_log_sdm_form}}" class="form-control validate" required>
                        @endif

                    </div>
                @endforeach
                <div class="row">
                    <div class="col-12 col-sm-4">
                        {{-- <button type="submit" class="btn btn-primary">Update
                        </button> --}}
                    </div>
                    <div class="col-12 col-sm-8 tm-btn-right">
                        <button type="submit" class="btn btn-success">Simpan
                        </button>
                    </div>
                </div>
            </form>
            @endif
        </div>
    </div>
</div>
