package com.qboxus.gograbapp.userschat.ViewHolders;


import android.view.View;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;

import com.facebook.drawee.view.SimpleDraweeView;
import com.qboxus.gograbapp.R;
import com.qboxus.gograbapp.userschat.ChatAdapter;
import com.qboxus.gograbapp.userschat.Chat_GetSet;

public class Chatviewholder extends RecyclerView.ViewHolder {

    public TextView message, datetxt, msgDate, username;
    public View view;
    public SimpleDraweeView chatImageView;

    public Chatviewholder(View itemView) {
        super(itemView);
        view = itemView;

        this.message = view.findViewById(R.id.messageText);
        this.username = view.findViewById(R.id.username);
        this.datetxt = view.findViewById(R.id.datetxt);
        this.msgDate = view.findViewById(R.id.msg_date);
        this.chatImageView = view.findViewById(R.id.chatImageView);

    }


    public void bind(final Chat_GetSet item,
                     final ChatAdapter.OnLongClickListener long_listener) {
        message.setOnLongClickListener(v -> {
            long_listener.onLongclick(item, v);
            return false;

        });
    }
}

