@extends('layouts.app-master')

@section('title', 'Edit Equipment')
@section('content')
    <div class="bg-light p-5 rounded">
        <div class="container">
            <h1>Edit Equipment</h1>
            <form action="{{ route('equipment.update', $equipment->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="name">Nom:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $equipment->name }}" required>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="availablequantity">Quantité disponible:</label>
                        <input type="number" name="availablequantity" id="availablequantity" class="form-control" value="{{ $equipment->availablequantity }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="price">Prix:</label>
                        <input type="text" name="price" id="price" class="form-control" value="{{ $equipment->price }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" class="form-control" required>{{ $equipment->description }}</textarea>
                </div>

                <div id="imageInputs">
                    <div class="form-group">
                        <label for="photos">Photos:</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="photos" name="photos[]" multiple>
                                <label class="custom-file-label" for="photos">Choisir les fichiers</label>
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-danger removeImage" type="button">Supprimer</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group text-center">
                    <button type="button" id="addImage" class="btn btn-secondary mb-3">Ajouter une autre photo</button>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#addImage').click(function() {
            var formGroup = $('<div/>', {
                'class': 'form-group'
            });
            var label = $('<label/>', {
                'for': 'photos',
                'text': 'Photos:'
            });
            var inputGroup = $('<div/>', {
                'class': 'input-group'
            });
            var customFile = $('<div/>', {
                'class': 'custom-file'
            });
            var input = $('<input/>', {
                'type': 'file',
                'class': 'custom-file-input',
                'id': 'photos',
                'name': 'photos[]',
                'multiple': 'multiple'
            });
            var customLabel = $('<label/>', {
                'class': 'custom-file-label',
                'for': 'photos',
                'text': 'Choisir les fichiers'
            });
            var inputGroupAppend = $('<div/>', {
                'class': 'input-group-append'
            });
            var removeButton = $('<button/>', {
                'class': 'btn btn-danger removeImage',
                'text': 'Supprimer'
            });

            inputGroupAppend.append(removeButton);
            customFile.append(input).append(customLabel);
            inputGroup.append(customFile).append(inputGroupAppend);
            formGroup.append(label).append(inputGroup).appendTo('#imageInputs');
        });

        $(document).on('click', '.removeImage', function(e) {
            e.preventDefault();
            $(this).closest('.form-group').remove();
        });
    });
</script>
@endsection
