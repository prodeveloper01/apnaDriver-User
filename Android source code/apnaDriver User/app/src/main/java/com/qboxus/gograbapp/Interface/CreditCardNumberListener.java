package com.qboxus.gograbapp.Interface;

import androidx.annotation.NonNull;

import com.qboxus.gograbapp.codeclasses.CreditCardBrand;


public interface CreditCardNumberListener {

    void onChanged(@NonNull String number, @NonNull CreditCardBrand brand);
}
