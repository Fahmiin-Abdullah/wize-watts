@if(!empty(Session::get('session_code')) && Session::get('session_code') == 'emailSent')
    <script>
        M.toast({html: 'A password reset email has been sent to your inbox'})
    </script>
@endif

@if(!empty(Session::get('session_code')) && Session::get('session_code') == 'passwordReset')
    <script>
        M.toast({html: 'Your password has been reset successfully'})
    </script>
@endif

@if(!empty(Session::get('session_code')) && Session::get('session_code') == 'newProduct')
    <script>
        M.toast({html: 'New product added successfully'})
    </script>
@endif

@if(!empty(Session::get('session_code')) && Session::get('session_code') == 'editProduct')
    <script>
        M.toast({html: 'Product updated successfully'})
    </script>
@endif

@if(!empty(Session::get('session_code')) && Session::get('session_code') == 'deleteProduct')
    <script>
        M.toast({html: 'Product deleted successfully'})
    </script>
@endif