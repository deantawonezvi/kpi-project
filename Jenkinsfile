node {

   def branch = 'master'
   def version
   def sshKeyId = 'ssh_dev'
   def deploymentServer = 'root@deant.work'
   def serviceName = 'kpi-project'
   def deploymentPath = "/opt/apps/${serviceName}"
   def gitCredentials = 'ci_checkout'
   def dockerRegistry = "registry.gitlab.com/deantawonezvi1/kpi-project"
   def slackToken = "slackToken"
try {
  slackSend color: "warning", message: "Build Started - ${serviceName} (Build #${env.BUILD_NUMBER}) (<${env.BUILD_URL}|Open>)", channel: "kpi-project-build-updates"


   stage('SCM') {
      git url: "https://gitlab.com/deantawonezvi1/kpi-project",
      credentialsId: gitCredentials,
      branch: "master"
    }


   stage("Config vars") {
        def props = readProperties file: 'docker/.env'
        version = props['APP_VERSION']

        println("Version: " + version)
        println("Branch: " + branch)
        println("Deployment path: " + deploymentPath)

   }

   docker.withRegistry('https://registry.gitlab.com', gitCredentials) {

   def dockerImage;

   stage('DOCKER IMAGE') {
      dockerImage = docker.build("$dockerRegistry:$branch-$version", "-f Dockerfile .")
   }

   stage('DOCKER PUSH') {
      dockerImage.push()
   }

   stage("CLEANUP") {
       sh "docker rmi $dockerRegistry:$branch$version || true"
     }
   }

    stage('DEPLOY DIR') {
        sshagent([sshKeyId]) {
            sh "ssh -o StrictHostKeyChecking=no -p 22 $deploymentServer mkdir /opt/apps/$serviceName || true"
        }
    }

    stage('DEPLOY ENV FILE') {
        sshagent([sshKeyId]) {
            sh "scp docker/.env $deploymentServer:$deploymentPath/"
        }
    }

    stage('DEPLOY DOCKER-COMPOSE') {
        sshagent([sshKeyId]) {
            sh "scp docker/docker-compose.yml docker/docker-compose.sh $deploymentServer:/opt/apps/${serviceName}/"
        }
    }

    stage('DEPLOY RUN SCRIPT') {
        sshagent([sshKeyId]) {
            sh "ssh -o StrictHostKeyChecking=no -p 22 $deploymentServer chmod +x /opt/apps/${serviceName}/docker-compose.sh"
        }
    }

    stage('DOCKER RUN') {
        retry(3) {
            sshagent([sshKeyId]) {
                sh "ssh -o StrictHostKeyChecking=no -p 22 $deploymentServer 'cd /opt/apps/${serviceName} && ./docker-compose.sh'"
            }
        }
    }
  stage('RESET WORKSPACE') {
       sh 'rm -rf .* * &>/dev/null || true'
   }
      slackSend color: "good", message: "Build Succeeded! - ${serviceName} (Build #${env.BUILD_NUMBER}) (<${env.BUILD_URL}|Open>)", channel: "kpi-project-build-updates"

   }catch (err) {
   slackSend color: "danger", message: "BUILD FAILED! - ${serviceName} (Build #${env.BUILD_NUMBER}) (<${env.BUILD_URL}|Open>)", channel: "kpi-project-build-updates"
            echo "Failed: ${err}"
            currentBuild.result = 'FAILURE'
        }




}
