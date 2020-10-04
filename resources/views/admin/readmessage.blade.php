<div class="card-body show collapse" >
     <!-- Post -->
     <div class="post">
        <div class="user-block">
          <img class="img-circle img-bordered-sm" src="{{ url($user->picture->file) }}" alt="{{ $user->name }}">
          <span class="username">
            <a href="#">{{ $contact->user->name }}</a>
          </span>
          <span class="description">{{ $contact->created_at }}</span>
        </div>
        <!-- /.user-block -->
        <p>
         {!! htmlspecialchars_decode($contact->message)  !!}
        </p>
      </div>
      <!-- /.post -->
</div>
