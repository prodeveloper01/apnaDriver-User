package com.qboxus.gograbapp.api;

import android.content.Context;
import com.qboxus.gograbapp.Constants;
import com.squareup.retrofitplus.api.ApiClient;

public class Singleton {
    private static ApiInterface apiInterface=null;

    public static ApiInterface getApiCall(Context context)
    {
        if (apiInterface==null)
        {
            apiInterface= ApiClient.getRetrofit(context, Constants.APILINK,Constants.API_KEY).create(ApiInterface.class);

        }
        return apiInterface;
    }
}
