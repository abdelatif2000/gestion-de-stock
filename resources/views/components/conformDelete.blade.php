 <div class="modal fade" id="conformDelete{{ $result->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
 <form action="{{ route($model.'.destroy', $result->id) }}" method="POST">
     @method("DELETE")
     @csrf
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">{{ __('public.deleteRecord') }} </h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <i class="fas fa-exclamation-circle mr-2 bg-warning"></i> {{ __('public.conform_delete') }}
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('public.no') }} </button>
                 <button id='deleteRecord' type="submit" class="btn btn-primary">{{ __('public.yes') }}</button>
             </div>
         </div>
     </div>
   </form>
 </div>
