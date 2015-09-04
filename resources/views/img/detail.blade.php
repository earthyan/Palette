@extends('layouts.app')

@section('content')
  <ol class="breadcrumb">
    <li><a href="/home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
    <li>图片</li>
    <li class="active">图片 {{ $image->name }} 的详细信息</li>
  </ol>

  <div class="text-center">
    <table class="table table-striped text-left">
      <tbody>
        <tr>
          <th>缩略图</th>
          <td width="80%"><img src="/link/{{ $image->uuid }}.{{ $image->ext }}" class="img-thumbnail"></td>
        </tr>
        <tr>
          <th>图片名称</th>
          <td>{{ $image->name }}</td>
        </tr>
        <tr>
          <th>图片大小</th>
          <td>{{ $image->size }} KB</td>
        </tr>
        <tr>
          <th>图片外链</th>
          <td>
            <p>
              <div class="input-group col-md-7">
                <div class="input-group-addon">直链</div>
                <input type="text" class="form-control" value="{{ url('link/'.$image->uuid.'.'.$image->ext) }}">
              </div>
            </p>
            @if (count($cdns) > 0)
              @foreach($cdns as $cdn)
              <p>
                <div class="input-group col-md-7">
                  <div class="input-group-addon">{{ $cdn->name }}</div>
                  <input type="text" class="form-control" value="{{ $cdn->url }}/link/{{ $image->uuid }}.{{ $image->ext }}">
                </div>
              </p>
              @endforeach
            @endif
          </td>
        </tr>
      </tbody>
    </table>
  </div>
@endsection
