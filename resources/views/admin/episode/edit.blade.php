<div class="wrapper" style='padding-right:20px;padding-left: 20px;margin-bottom: 20px;'>

    <form action="{{ route('episode.update',$episode->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="nom" class="text-gray-800">{{ GoogleTranslate::trans("Intitulé du episode", app()->getLocale()) }}</label>
            <input type="text" class="form-control" value="{{ GoogleTranslate::trans($episode->title, app()->getLocale()) }}" name="title" id="inputEmail4">
            @error('title')
            <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="nom" class="text-gray-800">{{ GoogleTranslate::trans("Intitulé du episode", app()->getLocale()) }}</label>
            <input type="file" class="form-control" name="video" id="inputEmail4">
            @error('video')
            <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="motivation" class="text-gray-800">{{ GoogleTranslate::trans("Description du episode", app()->getLocale()) }}</label>
            <textarea class="form-control" id="summernote" name="description" cols="30" rows="10">{{ GoogleTranslate::trans($episode->description, app()->getLocale()) }}</textarea>
            @error('description')
            <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
            @enderror
        </div>
        <button style='padding-right:20px;' type="submit" class="btn btn-primary">{{ GoogleTranslate::trans("Enrégistrer", app()->getLocale()) }}</button>

    </form>
</div>
