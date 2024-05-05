@extends('layouts.admin')

@section('content')
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="row">
                @if($episodes->isEmpty())
                    <div class="col-md-12">
                        <p>لا توجد حلقات لهذا المسلسل حتى الآن.</p>
                    </div>
                @else
                    @foreach($episodes as $episode)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <img class="card-img-top" src="{{ $episode->thumbnail_url }}" alt="{{ $episode->title }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $episode->title }}</h5>
                                    <p class="card-text">{{ $episode->description }}</p>
                                    <p class="card-text">Duration: {{ $episode->duration }}</p>
                                    <p class="card-text">Airing Time: {{ $episode->airing_time }}</p>
                                </div>
                                <div class="card-footer">
                                    <!-- زر التعديل -->
                                    @auth
                                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#editModal">تعديل</a>
                                        <!-- زر الحذف -->
                                        <form action="{{ route('admin.episodes.destroy', ['episode' => $episode->id]) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">حذف</button>
                                        </form>
                                    @endauth
                                </div>
                            </div>
                        </div>
                
            </div>
        </div>
    </div>

    <!-- Modal for Delete -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">تأكيد المسح</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    هل أنت متأكد أنك تريد حذف هذا العنصر؟
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                    <form action="{{ route('admin.episodes.destroy', ['episode' => $episode->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">حذف</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Edit -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.episodes.update', ['episode' => $episode->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- حقل عنوان الحلقة -->
                    <div class="form-group">
                        <label for="title">عنوان الحلقة:</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $episode->title }}">
                    </div>

                    <!-- حقل وصف الحلقة -->
                    <div class="form-group">
                        <label for="description">وصف الحلقة:</label>
                        <textarea class="form-control" id="description" name="description">{{ $episode->description }}</textarea>
                    </div>

                    <!-- حقل مدة الحلقة -->
                    <div class="form-group">
                        <label for="duration">مدة الحلقة (بالدقائق):</label>
                        <input type="text" class="form-control" id="duration" name="duration" value="{{ $episode->duration }}">
                    </div>

                    <!-- حقل وقت بث الحلقة -->
                    <div class="form-group">
                        <label for="airing_time">وقت بث الحلقة:</label>
                        <input type="text" class="form-control" id="airing_time" name="airing_time" value="{{ $episode->airing_time}}">
                    </div>

                    <!-- زر تقديم النموذج -->
                    <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
                @endif
@endsection
