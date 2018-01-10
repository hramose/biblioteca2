<template>
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{titulo}}</div>
                    <div class="panel-body">
                        {{name}} {{cuerpo}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    //alert(1);
    export default {
    props:['name','titulo','cuerpo'],
        mounted() {
            console.log('Component ready.');
        }
    }
    //alert(2);
</script>
