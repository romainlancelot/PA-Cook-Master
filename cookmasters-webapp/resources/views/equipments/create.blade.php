@extends('layouts.app-master')

@section('title', 'Créer un équipement')

@section('content')
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Créer un équipement</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('equipment.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                            <label for="name">Nom:</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="availablequantity">Quantité disponible:</label>
                            <input type="number" name="availablequantity" id="availablequantity" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="price">Prix:</label>
                            <input type="text" name="price" id="price" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" class="form-control" required></textarea>
                    </div>

                    <div id="imageInputs">
                        <div class="form-group">
                            <label for="photos">Photos:</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="photos" name="photos[]">
                                    <label class="custom-file-label" for="photos">Choisir le fichier</label>
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-danger removeImage">Supprimer</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="button" id="addImage" class="btn btn-secondary mb-3">Ajouter une autre photo</button>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Créer</button>
                    </div>
                </form>
            </div>
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
                'name': 'photos[]'
            });
            var customLabel = $('<label/>', {
                'class': 'custom-file-label',
                'for': 'photos',
                'text': 'Choisir le fichier'
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
