require 'spec_helper'

describe 'nginx' do
  describe service('nginx') do
    it { should be_enabled }
    it { should be_running }
  end

  describe port(80) do
    it { should be_listening }
  end

  describe command('nginx -T') do
    its(:stderr) { should include('test is successful') }
    its(:stdout) { should include('server_name www.ch.koalaa.dev') }
    its(:stdout) { should include('server_name zed.ch.koalaa.dev') }
  end
end
