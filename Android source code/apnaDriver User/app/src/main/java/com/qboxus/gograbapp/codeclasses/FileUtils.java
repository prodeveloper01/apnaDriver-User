package com.qboxus.gograbapp.codeclasses;

import android.content.Context;


public class FileUtils {

    public static String getAppFolder(Context activity){
        return activity.getExternalFilesDir(null).getPath()+"/";
    }
}
