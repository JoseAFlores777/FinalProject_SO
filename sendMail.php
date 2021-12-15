<div id="SendMAil">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Correo</h1>

    <hr>

    <div class="mt-5 col-12 text-center">
        <h1>Enviar Correo</h1>
    </div>

    <div class="card">
        <div class="card-body">
            <form id="EmailForm">
                <div class="mb-3">
                    <label for="senTo" class="form-label">To</label>
                    <input  type="email" class="form-control" id="senTo" aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input  type="text" class="form-control" id="subject">
                </div>
                <div class="form-floating">
                    <textarea  class="form-control" placeholder="Email Content" id="floatingTextarea2" style="height: 100px"></textarea>
                </div>
                <a  onclick="sendEmail()" class="btn btn-primary">Enviar</a>
            </form>
        </div>
    </div>




</div>

