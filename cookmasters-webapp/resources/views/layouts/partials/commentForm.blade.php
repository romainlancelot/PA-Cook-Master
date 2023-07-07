<!-- Button trigger modal -->
<!-- CSS de Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- JS, Popper.js, and jQuery de Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#commentModal">
  Laisser un commentaire
</button>
<style>
.rating {
    float: left;
    width: 300px;
}

.rating label {
    font-size: 30px;
    color: #ddd;
    float: right;
    cursor: pointer;
    -webkit-transition: color 0.3s ease-in-out;
    -moz-transition: color 0.3s ease-in-out;
    -o-transition: color 0.3s ease-in-out;
    transition: color 0.3s ease-in-out;
}

.rating input[type="radio"] {
    position: absolute;
    visibility: hidden;
}

.rating label:hover,
.rating label:hover ~ label,
.rating input[type="radio"]:checked ~ label {
    color: #f2b600;
}
</style>
<!-- Modal -->
<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="commentModalLabel">Laisser un commentaire</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('comments.store', $equipment->id) }}">
          @csrf
          <div class="form-group">
            <div class="rating">
                <input type="radio" id="star5" name="rating" value="5"><label for="star5">★</label>
                <input type="radio" id="star4" name="rating" value="4"><label for="star4">★</label>
                <input type="radio" id="star3" name="rating" value="3"><label for="star3">★</label>
                <input type="radio" id="star2" name="rating" value="2"><label for="star2">★</label>
                <input type="radio" id="star1" name="rating" value="1"><label for="star1">★</label>
            </div>
            @error('rating')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <textarea class="form-control @error('body') is-invalid @enderror" name="body" rows="5" placeholder="Écrivez votre commentaire ici..."></textarea>
            @error('body')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary">Publier le commentaire</button>
        </form>
      </div>
    </div>
  </div>
</div>
