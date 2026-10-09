function windowOnClick(event) {  

    if (event.target === modal_projecto) {
        showProjectModal();   
    }

    if(event.target === modal_view_comments){
        open_view_comments();
    }
}

window.addEventListener("click", windowOnClick);

/******************************************
*Modal para ver detalhes do projecto      *
******************************************/
    var modal_projecto = document.querySelector('.modal-project');
    var btn_view_project = document.querySelectorAll('.btn-view-project');
    
    function showProjectModal(){
        modal_projecto.classList.toggle("show-modal-project");
        var projecto_id = this.id;
        
        $.ajax({
            url: '../includes/load_modal.php',
            method: 'post',
            data:{projecto_id:projecto_id},
            dataType:'json',
            beforeSend:function(){
                $('#loader').show();
            },
            success:function(data){

                $('#modal_view_pname').html(data.projecto_nome);
                $('#modal_view_pimage').html(data.projecto_imagem);
                $('#modal_view_pcontext').html(data.projecto_contexto);
                $('#modal_view_pmission').html(data.projecto_missao);
                $('#modal_view_pgoal').html(data.projecto_objectivo);
                $('#modal_view_pmetodology').html(data.projecto_metodologia);
                $('#modal_view_pentregaveis').html(data.projecto_entregaveis);
                $('#modal_view_priscos').html(data.projecto_riscos);
                $('#modal_view_pmembers').html(data.projecto_membros);
                $('#modal_view_pfases').html(data.projecto_fases);
                $('#modal_view_pfases_table').html(data.projecto_fases_table);
                
                am4core.ready(function() {

                    // Themes begin
                    am4core.useTheme(am4themes_animated);
                    // Themes end

                    var chart = am4core.create("modal_view_pfases", am4charts.XYChart);
                    chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

                    chart.paddingRight = 30;
                    chart.dateFormatter.inputDateFormat = "dd-MM-yyyy HH:mm"; //yyyy-MM-dd HH:mm

                    var colorSet = new am4core.ColorSet();
                    colorSet.saturation = 0.4;
                    
                    chart.data = data.projecto_fases;

                    var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
                    categoryAxis.dataFields.category = "name";
                    categoryAxis.renderer.grid.template.location = 0;
                    categoryAxis.renderer.inversed = true;
                    
                    var d = new Date();
                    var n = d.getFullYear()+1;
                    
                    var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
                    dateAxis.dateFormatter.dateFormat = "dd-MM-yyyy HH:mm"; //yyyy-MM-dd HH:mm
                    dateAxis.renderer.minGridDistance = 70;
                    dateAxis.baseInterval = { count: 30, timeUnit: "minute" };
                    dateAxis.max = new Date(n, 0, 1, 24, 0, 0, 0).getTime();
                    dateAxis.strictMinMax = true;
                    dateAxis.renderer.tooltipLocation = 0;

                    var series1 = chart.series.push(new am4charts.ColumnSeries());
                    series1.columns.template.width = am4core.percent(80);
                    series1.columns.template.tooltipText = "{name}: {openDateX} - {dateX}";

                    series1.dataFields.openDateX = "fromDate";
                    series1.dataFields.dateX = "toDate";
                    series1.dataFields.categoryY = "name";
                    series1.columns.template.propertyFields.fill = "color"; // get color from data
                    series1.columns.template.propertyFields.stroke = "color";
                    series1.columns.template.strokeOpacity = 1;

                    chart.scrollbarX = new am4core.Scrollbar();

                    }); // end am4core.ready()
            },
            complete:function(){
                $('#loader').hide();
            }   
        });
    }
    
    for(var i=0 ; i< btn_view_project.length ; i++){
        btn_view_project[i].addEventListener("click",showProjectModal);
    }

/*********************************
*Função para carregar comentários*
*na modal de ver comentários     *
*********************************/
function get_comments2(id){
    $.ajax({
        url:'../includes/read_data',
        method:'post',
        data:{get_comentario:id},
        dataType:'html',
        beforeSend:function(){
            $('#loader').show();
        },
        success:function(data){
            $('#comment__view__holder').html(data);
        },
        complete:function(){
            $('#loader').hide();
        }
    });
}


/********************************************
*Abrir Modal de vizualização de commentários*
*de projectos                               *
********************************************/
var open_comments = document.querySelectorAll('.btn-view-project-comments');
var modal_view_comments = document.querySelector('.modal_view_comments');
var close_comments = document.querySelector('.close-view-comments');

function open_view_comments(){
    modal_view_comments.classList.toggle('show-view-comments');
    var project_id = this.id;
    get_comments2(project_id);
}

close_comments.addEventListener('click',open_view_comments);

for(var i=0; i<open_comments.length;i++){
    open_comments[i].addEventListener('click',open_view_comments);
}