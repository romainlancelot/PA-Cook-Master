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
                    <div class="form-group">
                        <label for="name">Nom:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="category">Catégorie:</label>
                        <input type="text" name="category" id="category" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="marque">Marque:</label>
                        <input type="text" name="marque" id="marque" class="form-control" required>
                    </div>

                    <div id="keyFeaturesInputs">
                        <div class="form-group">
                            <label for="key_features">Caractéristiques clés:</label>
                            <div class="input-group">
                                <input type="text" name="key_features[]" id="key_features" class="form-control">
                                <div class="input-group-append">
                                    <button class="btn btn-danger removeFeature">Supprimer</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="button" id="addFeature" class="btn btn-secondary mb-3">Ajouter une Caractéristiques clés</button>
                    </div>

                    <div id="colorInputs">
                        <div class="form-group">
                            <label for="color">Color:</label>
                            <div class="input-group">
                                <input type="text" name="color[]" id="color" class="form-control">
                                <div class="input-group-append">
                                    <button class="btn btn-danger removeColor">Supprimer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="button" id="addColor" class="btn btn-secondary mb-3">Ajouter une autre couleur</button>
                    </div>
    
                    <div class="form-group">
                        <label for="simple_description">Description simple:</label>
                        <input type="text" name="simple_description" id="simple_description" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="warranty_url">Url de garantie:</label>
                        <input type="text" name="warranty_url" id="warranty_url" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="height">Hauteur:</label>
                        <input type="text" name="height" id="height" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="width">Largeur</label>
                        <input type="text" name="width" id="width" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="depth">Profondeur:</label>
                        <input type="text" name="depth" id="depth" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="dimensional_guide_url">Url de guide dimensionnel:</label>
                        <input type="text" name="dimensional_guide_url" id="dimensional_guide_url" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name_3d">Url de model 3D:</label>
                        <input type="text" name="name_3d" id="name_3d" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="manual_url">Url du manuel:</label>
                        <input type="text" name="manual_url" id="manual_url" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Prix:</label>
                        <input type="text" name="price" id="price" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="availablequantity">Quantité disponible:</label>
                        <input type="number" name="availablequantity" id="availablequantity" class="form-control" required>
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

        $('#addFeature').click(function() {
            var formGroup = $('<div/>', {
                'class': 'form-group'
            });
            var label = $('<label/>', {
                'for': 'key_features',
                'text': 'Key Features:'
            });
            var inputGroup = $('<div/>', {
                'class': 'input-group'
            });
            var input = $('<input/>', {
                'type': 'text',
                'class': 'form-control',
                'id': 'key_features',
                'name': 'key_features[]'
            });
            var inputGroupAppend = $('<div/>', {
                'class': 'input-group-append'
            });
            var removeButton = $('<button/>', {
                'class': 'btn btn-danger removeFeature',
                'text': 'Supprimer'
            });

            inputGroupAppend.append(removeButton);
            inputGroup.append(input).append(inputGroupAppend);
            formGroup.append(label).append(inputGroup).appendTo('#keyFeaturesInputs');
        });

        $(document).on('click', '.removeFeature', function(e) {
            e.preventDefault();
            $(this).closest('.form-group').remove();
        });

        $('#addColor').click(function() {
            var formGroup = $('<div/>', {
                'class': 'form-group'
            });
            var label = $('<label/>', {
                'for': 'color',
                'text': 'Color:'
            });
            var inputGroup = $('<div/>', {
                'class': 'input-group'
            });
            var input = $('<input/>', {
                'type': 'text',
                'class': 'form-control',
                'id': 'color',
                'name': 'color[]'
            });
            var inputGroupAppend = $('<div/>', {
                'class': 'input-group-append'
            });
            var removeButton = $('<button/>', {
                'class': 'btn btn-danger removeColor',
                'text': 'Supprimer'
            });

            inputGroupAppend.append(removeButton);
            inputGroup.append(input).append(inputGroupAppend);
            formGroup.append(label).append(inputGroup).appendTo('#colorInputs');
        });

        $(document).on('click', '.removeColor', function(e) {
            e.preventDefault();
            $(this).closest('.form-group').remove();
        });
    });
</script>
@endsection
