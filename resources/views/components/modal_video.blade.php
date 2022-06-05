<div class="modal fade" id="modalVideo{{$id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-650">
        <div class="modal-content">
            <div class="modal-body">
                <h5>{{$title}}</h5>
                <div class="flex-start tm-card-infos mb-4">
                    <span><i class="ri-user-line text-main"></i> {{ $teacher}}</span>
                    <span><i class="ri-calendar-2-fill text-danger"></i> {{ $date }}</span>
                </div>
                <video width="100%" height="480" controls>
                    <source src="{!! asset($watch) !!}" type="video/mp4">
                    Error Not Load Video
                </video>
                <!--<iframe width="100%" height="350px" src="{!! asset($watch) !!}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
            </div>
        </div>
    </div>
</div>
