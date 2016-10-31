require 'spec_helper'

describe 'php' do
  describe service('php7.0-fpm') do
    it { should be_enabled }
    it { should be_running }
  end

  describe port(80) do
    it { should be_listening }
  end

  describe command('php -v') do
    its(:stdout) { should include('PHP 7.0') }
    its(:stdout) { should include('with Zend OPcache') }
    its(:stdout) { should include('with Xdebug') }
  end

  describe command('php -i') do
    its(:stderr) { should_not include('NOTICE') }
    its(:stderr) { should_not include('WARNING') }
    its(:stderr) { should_not include('ERROR') }
  end

  describe command('php-fpm7.0 -i') do
    its(:stdout) { should include('opcache.enable => On => On') }
    its(:stderr) { should_not include('NOTICE') }
    its(:stderr) { should_not include('WARNING') }
    its(:stderr) { should_not include('ERROR') }
  end

end
