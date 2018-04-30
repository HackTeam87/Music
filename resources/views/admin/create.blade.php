@extends('layouts.admin._index')

@section('title','Добавить пост')



@section('content')
    <section class="content">


        @if (Session::get('message') != Null)
            <div class="row">
                <div class="col-md-12 centered prime-text">
                    {{ Session::get('message') }}
                </div>
            </div>
        @endif


        <div class="row">
            <div class="col-md-4">

                <nav aria-label="Page navigation ">
                    {{ $music->links() }}
                </nav>

            </div
            <div class="col-md-12">

                <div class="table-responsive">
                    <table class="table ">

                        <th class="prime-text">Заголовок</th>
                        <th class="prime-text">Текст</th>
                        <th class="prime-text">Изображение</th>

                        @foreach($music as $item)
                            <div class="container-fluid">
                                <tr>

                                    <td class="col-md-1">{!! $item->title !!}</td>
                                    <td class="col-md-5">{!! $item->text !!}</td>
                                    <td class="col-md-1">
                                        <img src="/blog/images/{!! $item->img!!}" alt="img" width="100px">
                                    </td>

                                </tr>
                                <tr>
                                    <td class="col-md-3">
                                        {{--Show--}}
                                        <a title="Read article" href="{{ url('admin/'.$item->id) }}"
                                           class="btn btn-primary"><span class="fa fa-newspaper-o"></span></a>

                                        {{--Edit--}}
                                        <a title="Edit article" href="{{ url('admin/'.$item->id.'/edit') }}"
                                           class="btn btn-warning"><span class="fa fa-edit"></span></a>


                                        {{--Delete--}}
                                        <button title="Delete article" type="button" class="btn btn-danger"
                                                data-toggle="modal"
                                                data-target="#delete_article_{{ $item->id  }}"><span
                                                    class="fa fa-trash-o"></span>
                                        </button>

                                    </td>
                                </tr>

                            </div>
                        @endforeach
                    </table>
                </div>

                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">CK Editor
                            <small>Advanced and full of features</small>
                        </h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-info btn-sm" data-widget="collapse"
                                    data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                                    title="Remove">
                                <i class="fa fa-times"></i>
                            </button>

                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                        {!! Form::open(['route'=>'store','method'=>'POST','files' => true]) !!}

                       <div class="row">
                           <div class="col-sm-3">
                               <label for="img">img</label>
                               <input type="file" name="img" class=" btn btn-primary ">
                           </div>
                           <div class="col-sm-3">
                               <label for="songs">songs</label>
                               <input type="file" name="songs" class=" btn btn-primary" >
                           </div>
                       </div>


                        {!! Form::text('title',null,['class'=>'form-control','placeholder' => 'Заголовок']) !!}

                        <textarea id="textarea1" name="text" rows="10" cols="80">

                            </textarea>

                        <script>
                            CKEDITOR.replace('text');
                        </script>
                        {!! Form::submit('Отправить',['class'=>'btn btn-primary form-control']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>

    {{--//modal--}}

    @foreach($music as $item)
        <div class="modal fade" id="delete_article_{{ $item->id  }}" tabindex="-1" role="dialog"
             aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <form class="" action="{{ route('destroy', ['id' => $item->id]) }}" method="post">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header bg-red">
                            <h4 class="modal-title" id="mySmallModalLabel">Delete article</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>


                        <div class="modal-body">
                            Are you sure to delete article: <b>{{ $item->title }} </b>?

                        </div>
                        <div class="modal-footer">
                            <a href="{{ url('/') }}">
                                <button type="button" class="btn btn-dropbox pull-left " data-dismiss="modal">Close
                                </button>
                            </a>
                            <button type="submit" class="btn btn-danger" title="Delete" value="delete">Delete</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endforeach

@endsection
