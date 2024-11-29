<script id="userOptionsTemplate" type="text/template">
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
    function formatUserOptions(user) {
        console.log(user);

        if (user.loading) {
            return user.name;
        }
        let html = $('#userOptionsTemplate').html()
            .replace(/%%NAME%%/g, '' + user.name)
            .replace(/%%AVATAR-URL%%/g, '' + user.avatar)
            .replace(/%%DEPARTMENTS%%/g, '' + user.departments)
            .replace(/%%CENTER%%/g, '' + user.center);
        return $(html);
    }

    function formatUserSelection(user) {
        if (user.id === '') { // adjust for custom placeholder values
            return 'Select/Search User';
        }
        return user.name;
        // return user.name + (user.departments_nonHtml !== "" ? " [" + user.departments_nonHtml + "]" : '');

    }

</script>
