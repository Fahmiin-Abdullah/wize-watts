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

@if(!empty(Session::get('session_code')) && Session::get('session_code') == 'reviewSuccess')
    <script>
        M.toast({html: 'Review posted successfully'})
    </script>
@endif

@if(!empty(Session::get('session_code')) && Session::get('session_code') == 'editReview')
    <script>
        M.toast({html: 'Review updated successfully'})
    </script>
@endif

@if(!empty(Session::get('session_code')) && Session::get('session_code') == 'deleteReview')
    <script>
        M.toast({html: 'Review deleted successfully'})
    </script>
@endif

@if(!empty(Session::get('session_code')) && Session::get('session_code') == 'infoUpdate')
    <script>
        M.toast({html: 'Info updated successfully'})
    </script>
@endif

@if(!empty(Session::get('session_code')) && Session::get('session_code') == 'addressUpdate')
    <script>
        M.toast({html: 'Address updated successfully'})
    </script>
@endif

@if(!empty(Session::get('session_code')) && Session::get('session_code') == 'mailSubscribed')
    <script>
        M.toast({html: 'Congratulations, you are now in our mailing list!'})
    </script>
@endif

@if(!empty(Session::get('session_code')) && Session::get('session_code') == 'mailUpdate')
    <script>
        M.toast({html: 'Your email has been updated!'})
    </script>
@endif

@if(!empty(Session::get('session_code')) && Session::get('session_code') == 'deleteMail')
    <script>
        M.toast({html: 'Email removed successfully'})
    </script>
@endif

@if(!empty(Session::get('session_code')) && Session::get('session_code') == 'categoryCreated')
    <script>
        M.toast({html: 'Category added successfully'})
    </script>
@endif

@if(!empty(Session::get('session_code')) && Session::get('session_code') == 'subcategoryCreated')
    <script>
        M.toast({html: 'Subcategory added successfully'})
    </script>
@endif

@if(!empty(Session::get('session_code')) && Session::get('session_code') == 'categoryDelete')
    <script>
        M.toast({html: 'Category deleted successfully'})
    </script>
@endif

@if(!empty(Session::get('session_code')) && Session::get('session_code') == 'subcategoryDelete')
    <script>
        M.toast({html: 'Subcategory deleted successfully'})
    </script>
@endif

@if(!empty(Session::get('session_code')) && Session::get('session_code') == 'cartAdded')
    <script>
        M.toast({html: 'Item added to cart!'})
    </script>
@endif

@if(!empty(Session::get('session_code')) && Session::get('session_code') == 'itemDeleted')
    <script>
        M.toast({html: 'Item removed from cart!'})
    </script>
@endif

@if(!empty(Session::get('session_code')) && Session::get('session_code') == 'statusUpdated')
    <script>
        M.toast({html: 'Order status updated!'})
    </script>
@endif