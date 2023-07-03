function addStep() {
    var steps = document.getElementById("steps");

    var step = document.createElement("div");
    var step_nb = document.getElementById("steps").childElementCount + 1;
    step.className = "form-group mb-3";
    if (step_nb > 1) { step.innerHTML = "<hr>"; }
    step.innerHTML += '<label for="step_' + step_nb + '_title">Step ' + step_nb + ' title:</label>';
    step.innerHTML += '<input type="text" name="steps[' + step_nb + '][title]" id="step_' + step_nb + '_title" class="form-control" required>';
    step.innerHTML += '<label for="step_' + step_nb + '_description">Step ' + step_nb + ' description:</label>';
    step.innerHTML += '<textarea name="steps[' + step_nb + '][description]" id="step_' + step_nb + '_description" class="form-control"></textarea>';

    var remove_button = document.createElement("button");
    remove_button.className = "btn btn-danger";
    remove_button.type = "button";
    remove_button.innerHTML = "Remove step";
    remove_button.onclick = function() { removeStepOnCreate(this); };

    steps.appendChild(step);
    step.appendChild(remove_button);
}

function addIngredient() {
    var ingredients = document.getElementById("ingredients");

    var ingredient = document.createElement("div");
    var ingredient_nb = document.getElementById("ingredients").childElementCount + 1;
    ingredient.className = "form-group mb-3";
    if (ingredient_nb > 1) { ingredient.innerHTML = "<hr>"; }
    ingredient.innerHTML += '<label for="ingredient_' + ingredient_nb + '_name">Ingredient ' + ingredient_nb + ' name:</label>';
    ingredient.innerHTML += '<input type="text" name="ingredients[' + ingredient_nb + '][name]" id="ingredient_' + ingredient_nb + '_name" class="form-control" required>';
    ingredient.innerHTML += '<label for="ingredient_' + ingredient_nb + '_quantity">Ingredient ' + ingredient_nb + ' quantity:</label>';
    ingredient.innerHTML += '<input type="text" name="ingredients[' + ingredient_nb + '][quantity]" id="ingredient_' + ingredient_nb + '_quantity" class="form-control">';

    var remove_button = document.createElement("button");
    remove_button.className = "btn btn-danger";
    remove_button.type = "button";
    remove_button.innerHTML = "Remove ingredient";
    remove_button.onclick = function() { removeIngredientOnCreate(this); };

    ingredients.appendChild(ingredient);
    ingredient.appendChild(remove_button);
}

function removeStepOnCreate(button) {
    var step = button.parentElement;
    step.remove();
}

function removeStep(button) {
    var step = button.parentElement.parentElement;
    step.remove();
}

function removeIngredientOnCreate(button) {
    var ingredient = button.parentElement;
    ingredient.remove();
}

function removeIngredient(button) {
    var ingredient = button.parentElement.parentElement;
    ingredient.remove();
}
