package com.qboxus.gograbapp.activitiesandfragment;

import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.os.Looper;

import com.qboxus.gograbapp.codeclasses.AppCompatLocaleActivity;

import com.qboxus.gograbapp.api.Singleton;
import com.qboxus.gograbapp.codeclasses.DataParse;
import com.qboxus.gograbapp.codeclasses.Functions;
import com.qboxus.gograbapp.codeclasses.MyPreferences;
import com.qboxus.gograbapp.codeclasses.Variables;
import com.qboxus.gograbapp.food.NoInternetDialog;
import com.qboxus.gograbapp.Interface.APICallBack;
import com.qboxus.gograbapp.Interface.FragmentCallBack;
import com.qboxus.gograbapp.R;
import com.qboxus.gograbapp.model.ActiveRequestModel;
import com.qboxus.gograbapp.ride.activeride.ActiveRideA;
import com.squareup.retrofitplus.api.RetrofitRequest;
import com.squareup.retrofitplus.interfaces.ApiCallback;

import org.json.JSONException;
import org.json.JSONObject;


public class SplashActivity extends AppCompatLocaleActivity {

    private final int splashDisplayLength = 3000;
    Boolean islogin = false;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        Functions.setLocale(MyPreferences.getSharedPreference(this).getString(MyPreferences.setlocale, Variables.DEFAULT_LANGUAGE_CODE)
                , this, getClass(),false);
        setContentView(R.layout.activity_splash);

        MyPreferences.mPrefs = getSharedPreferences(MyPreferences.prefName, MODE_PRIVATE);
        MyPreferences.downloadSharedPreferences = getSharedPreferences(MyPreferences.downloadPref, MODE_PRIVATE);
        islogin = MyPreferences.getSharedPreference(SplashActivity.this).getBoolean(MyPreferences.isLogin, false);
        Functions.logDMsg("isLogin : " + islogin);
        if (Functions.isConnectedToInternet(SplashActivity.this)) {
            goToNextScreen();
        } else {
            NoInternetDialog internetDialog = new NoInternetDialog(new FragmentCallBack() {
                @Override
                public void onItemClick(Bundle bundle) {
                    goToNextScreen();
                }
            });
            internetDialog.show(getSupportFragmentManager(), "internetDialog");
        }

    }


    private void goToNextScreen() {

        new Handler(Looper.getMainLooper()).postDelayed(new Runnable() {
            @Override
            public void run() {

                if (islogin) {
                    callapiShowactiverequest();
                } else {
                    getCurrency();

                }
            }
        }, splashDisplayLength);
    }


    private  void getCurrency(){

        RetrofitRequest.JsonPostRequest(SplashActivity.this,
                new JSONObject().toString(),
                Singleton.getApiCall(SplashActivity.this).showCurrency(new JSONObject().toString()), new ApiCallback() {
                    @Override
                    public void onResponce(String resp,boolean isSuccess) {
                        if (isSuccess)
                        {
                            try {
                                JSONObject jsonObject=new JSONObject(resp);
                                String code=jsonObject.optString("code");
                                if(code.equals("200")){
                                    String currencySymbol=jsonObject.getJSONObject("msg").getJSONObject("Country").optString("currency_symbol","PKR");
                                    MyPreferences.getSharedPreference(SplashActivity.this).edit()
                                            .putString(MyPreferences.currencyUnit,currencySymbol).commit();

                                }
                            } catch (Exception e) {
                                Functions.logDMsg("Exception: "+e);
                            }
                            finally {
                                openLoginScreen();
                            }
                        }
                        else
                        {

                        }
                    }
                });

    }

    private void callapiShowactiverequest() {

        JSONObject params = new JSONObject();
        try {
            params.put("user_id", MyPreferences.getSharedPreference(SplashActivity.this).getString(MyPreferences.USER_ID, ""));

        } catch (JSONException e) {
            e.printStackTrace();
        }

        RetrofitRequest.JsonPostRequest(this,
                params.toString(),
                Singleton.getApiCall(SplashActivity.this).showActiveRequest(params.toString()), new ApiCallback() {
                    @Override
                    public void onResponce(String resp,boolean isSuccess) {
                        if (isSuccess)
                        {
                            if (resp != null) {
                                try {
                                    JSONObject respobj = new JSONObject(resp);
                                    if (respobj.getString("code").equals("200")) {
                                        DataParse.orderParseData(respobj, new APICallBack() {
                                            @Override
                                            public void onParseData(Object model) {
                                                ActiveRequestModel activeRequestModel = (ActiveRequestModel) model;
                                                Intent startIntent = new Intent(SplashActivity.this, ActiveRideA.class);
                                                Bundle bundle = new Bundle();
                                                bundle.putSerializable("dataModel", activeRequestModel);
                                                startIntent.putExtra("call", "splash");
                                                startIntent.putExtras(bundle);
                                                startActivity(startIntent);
                                                overridePendingTransition(R.anim.in_from_right, R.anim.out_to_left);
                                                finish();
                                            }
                                        });
                                    } else {
                                        startActivity(new Intent(SplashActivity.this, HomeActivity.class));
                                        overridePendingTransition(R.anim.in_from_right, R.anim.out_to_left);
                                        finish();
                                    }
                                } catch (Exception e) {
                                    Functions.logDMsg(" splash Exception: "+e);
                                }
                            }

                        }
                        else
                        {
                            Functions.cancelLoader();
                        }
                    }
                });
    }


    private void openLoginScreen(){
        Intent activity_intactivityIntentnt = new Intent(SplashActivity.this, LoginActivity.class);
        startActivity(activity_intactivityIntentnt);
        finish();
    }



}