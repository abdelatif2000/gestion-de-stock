    <!-- Modal -->
    <div class="modal fade" id="conformDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
              <div class="modal-body">
                 <i class="fas fa-exclamation-circle mr-2 bg-warning"></i>  {{ __('public.conform_delete')}}
              </div>
              <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('public.no')}} </button>
                 <button id='deleteRecord' type="button" class="btn btn-primary">{{__('public.yes')}}</button>
              </div>
           </div>
        </div>
     </div>
     <!--End Model -->