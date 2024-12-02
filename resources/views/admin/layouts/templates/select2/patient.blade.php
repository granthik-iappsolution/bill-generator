<script id="patientOptionsTemplate" type="text/template">
    <div style="display: flex;">
        {{-- <div class="user-img pr-1">
            <img src="%%AVATAR-URL%%" alt="%%NAME%%'s Image"
                 class="img-size-50" style="margin-top: 5px">
        </div> --}}
        <div class="user-name" style="display: grid">
            <span>%%NAME%%</span>
            {{-- <small class="user-roles">
                %%DEPARTMENTS%%
            </small>
            <small class="user-roles">
                %%CENTER%%
            </small> --}}
        </div>
    </div>
</script>

<script>
    function formatPatientOptions(patient) {
        if (patient.loading) {
            return patient.name;
        }
        let html = $('#patientOptionsTemplate').html()
            .replace(/%%NAME%%/g, '' + patient.name)
            .replace(/%%AVATAR-URL%%/g, '' + patient.avatar)
            .replace(/%%DEPARTMENTS%%/g, '' + patient.departments)
            .replace(/%%CENTER%%/g, '' + patient.center);
        return $(html);
    }

    function formatPatientSelection(patient) {
        if (patient.id === '') { // adjust for custom placeholder values
            return 'Select/Search Patient';
        }
        return patient.name;
        // return patient.name + (patient.departments_nonHtml !== "" ? " [" + patient.departments_nonHtml + "]" : '');

    }

</script>
