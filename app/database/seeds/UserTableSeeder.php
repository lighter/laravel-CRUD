<?php

class UserTableSeeder extends Seeder
{
  public function run() {
    DB::table('users')->delete();
    User::create(array(
        'name'     => 'Willy Lighter',
        'username' => 'Willy',
        'email'    => 'willy@gmail.com',
        'password' => Hash::make('awesome')
      ));
  }
}