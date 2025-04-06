<div class="dashboard">

    <div class="form-container">

        <form action="{{ route('toggle-premium') }}" method="POST">
            @csrf
            <h2>Click here to buy premium!</h2>
            <img src="https://preciousmetals.td.com/wcsstore/TDCatalogAssetStore/images/catalog/tdmetals/1%20oz%20Gold%20Britannia%20Coin%20KC%20(2023)/1-oz-Gold-Britannia-Coin-KC-(2023)_OBV.png">
            <div class="form-group">
                <h3>Only €13,37</h3>


                <br>
            </div>


            <button type="submit" class="btn btn-primary">Pay now!</button>


        </form>



    </div>
</div>