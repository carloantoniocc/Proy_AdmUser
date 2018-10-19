
		<!-- Authentication Links -->
		@if (!Auth::guest())

            
              <nav class="navbar navbar-default">

                   <!-- <a class="navbar-brand" href="{{ url('/home') }}"> Home </a> -->

                <div class="container-fluid">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>

                  </div>
                  <div id="navbar1" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                      <!-- <li class="active"><a href="/home">Home</a></li> -->
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Administración <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="/users">Usuarios</a></li>
                          <li><a href="/comunas">Comunas</a></li>
                          <li><a href="/tipoEstabs">Tipo Establecimientos</a></li>
                          <li class="divider"></li>
                          <li><a href="/Employe">Funcionarios</a></li>
                          <li><a href="/Categorie">Categorias</a></li>
                          <li><a href="/Department">Departamentos</a></li>
                          <li><a href="/Establishment">Establecimientos</a></li>
                          <li><a href="/PhoneModel">Modelos</a></li>
                          

                          
                        </ul>
                      </li>
                    </ul>
                  </div>
                  <!--/.nav-collapse -->
                </div>
                <!--/.container-fluid -->
              </nav>
            
			
		@endif
